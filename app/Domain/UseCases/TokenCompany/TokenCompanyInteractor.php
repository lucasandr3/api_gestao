<?php

namespace App\Domain\UseCases\TokenCompany;

use App\Factories\TokenCompany\TokenCompanyFactory;
use App\Repositories\Partner\PartnerRepository;

class TokenCompanyInteractor
{
    public function __construct(
        private readonly TokenCompanyRepositoryInterface $repository,
        private readonly TokenCompanyFactory $factory,
        private readonly TokenCompanyOutputInterface $output,
        private readonly PartnerRepository $partnerRepository
    )
    {}

    public function generateToken(TokenCOmpanyInputRequest $input)
    {
        $partner = $this->partnerRepository->getPartner($input->getDocument());

        if ($partner === null) {
            return $this->output->partnerNotFound();
        }

        $tokenCompany = $this->repository->getTokenCompany($input->getDocument());

        $data = $this->factory->make($partner->toArray());

        $result = $this->repository->generateToken($data->getTokenData());

        if (!$result) {
            return $this->output->unableCreate();
        }

        return $this->output->tokenCompany($result);
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
