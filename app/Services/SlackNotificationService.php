<?php

namespace App\Services;

use App\Models\Settings\Settings;
use App\Notifications\Partner\RegisterPartnerNotification;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ActionsBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ContextBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\SectionBlock;
use Illuminate\Notifications\Slack\BlockKit\Composites\ConfirmObject;
use Illuminate\Notifications\Slack\SlackMessage;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;

class SlackNotificationService
{
    public function newCustomer(Fluent $partner)
    {
        $preferences = $this->getPreferences();

        $message = (new SlackMessage)
            ->text('Um Novo Parceiro Foi Cadastrado')
            ->headerBlock('Novo Parceiro')
            ->contextBlock(function (ContextBlock $block) {
                $block->text('Parceiro #1234');
            })
            ->sectionBlock(function (SectionBlock $block) use ($partner) {
                $block->text('Gerar Chave do Parceiro e enviar no e-mail.');
                $block->field("Parceiro: $partner->name")->markdown();
                $block->field("CNPJ: $partner->document")->markdown();
            })
            ->dividerBlock()
            ->sectionBlock(function (SectionBlock $block) {
                $block->text('Obrigado.');
            })->actionsBlock(function (ActionsBlock $block) {
                $block->button('Gerar Chave')
                    ->primary()
                    ->confirm(
                        'Você tem certeza que deseja gerar chave ?',
                        function (ConfirmObject $dialog) {
                            $dialog->confirm('Sim');
                            $dialog->deny('Não');
                        }
                    )->title('Gerar Chave');
            });

        $preparedPreferences = $this->preparedPreferences($preferences);

        $notification = new Fluent([
           'preferences' => $preparedPreferences,
           'message' => $message
        ]);

        $this->sendNotification($notification, $partner->model);
    }

    private function sendNotification($notification, $model)
    {
        $channels = $notification->preferences['CHANNELS_SLACK'];

        foreach ($channels as $channel) {
            $notification->preferences['CHANNELS_SLACK'] = $channel;
            $model->notify((new RegisterPartnerNotification($notification)));
        }
    }

    private function getPreferences(): ?Collection
    {
        $settings = Settings::query()->where('config', '=', CONFIG_SLACK)->first();
        return $settings?->preferences->pluck('value', 'resource');
    }

    private function preparedPreferences($preferences)
    {
        $isMultipleChannels = strrpos($preferences['CHANNELS_SLACK'], "|");

        if ($isMultipleChannels !== false) {
            $preferences['CHANNELS_SLACK'] = explode('|', $preferences['CHANNELS_SLACK']);
        }

        if ($isMultipleChannels === false) {
            $preferences['CHANNELS_SLACK'] = [$preferences['CHANNELS_SLACK']];
        }

        return $preferences;
    }
}
