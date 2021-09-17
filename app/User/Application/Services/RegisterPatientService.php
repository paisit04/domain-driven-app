<?php

namespace App\User\Application\Services;

class RegisterPatientService
{
    private PatientRepository $patientRepository;
    private DocumentUploadService $docService;
    private PatientPrimaryService $patientPrimaryService;
    private PatientEligibilityService $patientEligibilityService;
    private EventDispatcher $eventDispatcher;
    
    public function __construct(
        PatientRepository $patientRepository,
        DocumentUploadService $docService,
        PatientPrimaryService $patientPrimaryService,
        PatientEligibilityService $patientEligibilityService,
        EventDispatcher $eventDispatcher
    ) {
        $this->patientRepository = $patientRepository;
        $this->docService = $docService;
        $this->patientPrimaryService = $patientPrimaryService;
        $this->patientEligibilityService = $patientEligibilityService;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function execute( PatientDetails $patientDetails,
                      array $patientDocuments,
                      PatientEligibility $patientEligibility,
                      Provider $registeredProvider,
                      ConsentForm $consentForm)
    {
        // EX: Step 1 - Create & persist the Patient entity:
        // run any business logic required for validation:
        if ($this->validatePatientDetails($patientDetails)) {
            $nextID = $this->patientRepository->nextId();
            $patient = new Patient($nextId, $patientDetails);
            $this->patientRepository->persist($patient);
            $this->eventDispatcher->dispatch(new PatientWasCreated($patient));
        }
        // ... validate the rest of the inputs ...
        // ... dispatch the remaining events ...
    }

    public function validatePatientDetails(PaymentDetails $paymentDetails)
    {
        //domain validations - although this could be better placed 
        //within the model itself as a precondition, it still works
        if ($valid) {
            return true;
        }
        return false;
    }
    // similar validation methods would follow
}