<?php

namespace App\Domain\UseCases\Partner;

use App\Factories\Partner\PartnerFactory;
use App\Services\SlackNotificationService;

class PartnerInteractor
{
    public function __construct(
        private readonly PartnerRepositoryInterface $repository,
        private readonly PartnerFactory $factory,
        private readonly PartnerOutputInterface $output,
        private readonly SlackNotificationService $slackNotification
    )
    {}

    public function createPartner(PartnerInputRequest $input)
    {
        $partner = $this->repository->getPartner($input->getDocument());

        if ($partner !== null) {
            return $this->output->partner($partner);
        }

        $data = $this->factory->make([
            'name' => $input->getName(),
            'document' => $input->getDocument()
        ]);

        $result = $this->repository->create($data->getPartner()->toArray());

        if (!$result) {
            return $this->output->unableCreate();
        }

        $this->slackNotification->newCustomer($data->getPartnerNotify());
        return $this->output->partner($result);
    }

    public function partners()
    {
        $partners = $this->repository->getAllPartners();
        return $this->output->partners($partners);
    }

    public function getParnter(PartnerInputRequest $input)
    {
        $partner = $this->repository->getPartner($input->getDocument());

        if ($partner === null) {
            return $this->output->notFound();
        }

        return $this->output->partner($partner);
    }

    public function unauthorize(PartnerInputRequest $input)
    {
        $partner = $this->repository->getPartner($input->getDocument());

        if ($partner === null) {
            return $this->output->notFound();
        }

        $response = $this->repository->unauthorize($partner);

        if (!$response) {
            return $this->output->unableUpdate();
        }

        return $this->output->success();
    }

    public function authorize(PartnerInputRequest $input)
    {
        $partner = $this->repository->getPartner($input->getDocument());

        if ($partner === null) {
            return $this->output->notFound();
        }

        $response = $this->repository->authorize($partner);

        if (!$response) {
            return $this->output->unableUpdate();
        }

        return $this->output->success();
    }
}
