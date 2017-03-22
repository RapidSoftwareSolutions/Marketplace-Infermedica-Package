<?php
namespace Tests;

require_once(__DIR__ . '/../src/Models/checkRequest.php');

class InfermedicaTest extends BaseTestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testRoutes($url) {
        $response = $this->runApp("POST", '/api/Infermedica/'.$url);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function dataProvider() {
        return [
            ['getAllConditions'],
            ['getSingleCondition'],
            ['computeDiagnosis'],
            ['getDatabaseInfo'],
            ['getAllLabTests'],
            ['getSingleLabTest'],
            ['getAllRiskFactors'],
            ['getSingleRiskFactor'],
            ['getMatchingObservations'],
            ['getAllSymptoms'],
            ['getSingleSymptom'],
            ['getMentions'],
            ['getExplanation'],
            ['getSingleMatchingObservation'],
            ['computeTriageLevel'],
        ];
    }
}