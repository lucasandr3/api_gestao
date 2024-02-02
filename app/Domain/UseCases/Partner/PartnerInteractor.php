<?php

namespace App\Domain\UseCases\Partner;

use App\Factories\Partner\PartnerFactory;

class PartnerInteractor
{
    public function __construct(
        private readonly PartnerRepositoryInterface $repository,
        private readonly PartnerFactory $factory,
        private readonly PartnerOutputInterface $output
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

        return $this->output->partner($result);
    }
}
