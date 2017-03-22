<?php
namespace Tests;

require_once(__DIR__ . '/../src/Models/checkRequest.php');

class LondonTheatreDirectTest extends BaseTestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testRoutes($url) {
        $response = $this->runApp("POST", '/api/LondonTheatreDirect/'.$url);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function dataProvider() {
        return [
            ['getEvents'],
            ['getEventsByType'],
            ['getSingleEvent'],
            ['getSingleEventPerformances'],
            ['getEventsPerformances'],
            ['getEventPerformancesByDate'],
            ['getSingleEventTickets'],
            ['getEventsTickets'],
            ['getSingleEventBookingInfo'],
            ['getSingleEventReviews'],
            ['getVenues'],
            ['getSingleVenue'],
            ['getSingleVenueEvents'],
            ['getSinglePerformance'],
            ['getSinglePerformanceTickets'],
            ['createBasket'],
            ['addTicketsToBasket'],
            ['getSingleBasket'],
            ['submitBasket'],
            ['getSubmittedBasketSummary'],
            ['deleteOrderFromBasket'],
            ['deleteAllFromBasket'],
            ['checkTicketAvailability'],
            ['getTicketPlanPrice'],
            ['getCountries'],
            ['getUSAStates'],
            ['getEventTypes'],
            ['getDeliveryTypes'],
            ['getSystemHeartBeat']
        ];
    }
}