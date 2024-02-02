<?php

namespace App\Http\Controllers\Customer;

use App\Domain\UseCases\Customer\CustomerInputRequest;
use App\Domain\UseCases\Customer\CustomerInteractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private readonly CustomerInteractor $interactor)
    {}

    public function newCustomer(CreateCustomerRequest $request)
    {
        echo "<pre>"; var_dump("chguei aqui"); echo "</pre>"; die;
        return $this->interactor->createCustomer(new CustomerInputRequest());
    }
}
