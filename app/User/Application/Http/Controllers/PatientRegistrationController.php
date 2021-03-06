<?php

namespace App\User\Application\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\User\Application\Services\PatientRegistrationService;
use App\User\Application\Requests\RegisterPatientRequest;
use App\Http\Controllers\Controller;

class PatientRegistrationController
{
    private $registrationService;

    public function __construct(PatientRegistrationService
                          $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function register(RegisterPatientRequest $request)
    {
        $patientDetails = $request->get('patient.details');
        $patientDocuments = $request->get('patient.documents');
        $patientEligibility = $request->get('patient.initial_eligibility');
        $registeredProvider = $request->get('patient.provider');
        $consentForm = $request->get('patient.consentForm');

        return new JsonResponse(
            $this->registrationService->execute(
                $patientDetails,
                $patientDocuments,
                $patientEligibility,
                $registeredProvider,
                $consentForm
            )
        );
    }
}
