<?php
$routes = [
    'getAllConditions',
    'getSingleCondition',
    'computeDiagnosis',
    'getDatabaseInfo',
    'getAllLabTests',
    'getSingleLabTest',
    'getAllRiskFactors',
    'getSingleRiskFactor',
    'getMatchingObservations',
    'getAllSymptoms',
    'getSingleSymptom',
    'getMentions',
    'getExplanation',
    'getSingleMatchingObservation',
    'computeTriageLevel',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

