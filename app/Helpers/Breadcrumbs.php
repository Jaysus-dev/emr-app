<?php

use App\Models\PatientList;

return [


/* Patient List*/
'patients.index' => [
   
    [
        'name' => 'Patients'
    ]
],



/*Patient Chart - Info*/
'patientchart.info' => function (PatientList $patient) {

    return [


        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
        ],

        [
            'name' => 'Patient Info'
        ]

    ];
},

/* Clinical Notes*/
'patientchart.clinical-notes' => function (PatientList $patient) {

    return [


        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
            'href' => route('patientchart.info', $patient)
        ],

        [
            'name' => 'Clinical Notes'
        ]

    ];
},

/* Vital Signs*/

'patientchart.vital-signs' => function (PatientList $patient) {

    return [

        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
            'href' => route('patientchart.info', $patient)
        ],

        [
            'name' => 'Vital Signs'
        ]

    ];
},

/*Plan*/

'patientchart.plan' => function (PatientList $patient) {

    return [

      

        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
            'href' => route('patientchart.info', $patient)
        ],

        [
            'name' => 'Plan'
        ]

    ];
},

/*Diet*/

'patientchart.diet' => function (PatientList $patient) {

    return [

      

        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
            'href' => route('patientchart.info', $patient)
        ],

        [
            'name' => 'Diet'
        ]

    ];
},

/*Diagnosis*/

'patientchart.diagnosis' => function (PatientList $patient) {

    return [

     

        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
            'href' => route('patientchart.info', $patient)
        ],

        [
            'name' => 'Diagnosis'
        ]

    ];
},

/*Abstract*/

'patientchart.abstract' => function (PatientList $patient) {

    return [

    

        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
            'href' => route('patientchart.info', $patient)
        ],

        [
            'name' => 'Abstract'
        ]

    ];
},

/* Documents*/

'patientchart.documents' => function (PatientList $patient) {

    return [

      
        [
            'name' => 'Patients',
            'href' => route('patients.index')
        ],

        [
            'name' => $patient->full_name,
            'href' => route('patientchart.info', $patient)
        ],

        [
            'name' => 'Documents'
        ]

    ];
},

];