<?php

namespace App\Domain\UseCases\TokenCompany;

use App\Factories\TokenCompany\TokenCompanyFactory;

class TokenCompanyInteractor
{
    public function __construct(
        private readonly TokenCompanyRepositoryInterface $repository,
        private readonly TokenCompanyFactory $factory,
        private readonly TokenCompanyOutputInterface $output
    )
    {}

    public function generateToken(TokenCOmpanyInputRequest $input)
    {
        echo "<pre>"; var_dump($input->getDocument()); echo "</pre>"; die;
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
