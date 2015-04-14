<?php
namespace Ably;

use Ably\Models\PaginatedResource;

class Presence {

    private $ably;
    private $channel;

    /**
     * Constructor
     * @param AblyRest $ably Ably API instance
     * @param Channel $channel Associated channel
     */
    public function __construct( AblyRest $ably, Channel $channel ) {
        $this->ably = $ably;
        $this->channel = $channel;
    }

    /**
     * Retrieves channel's presence data
     * @param array $params Parameters to be sent with the request
     * @return PaginatedResource
     */
    public function get( $params = array() ) {
        return new PaginatedResource( $this->ably, 'Ably\Models\PresenceMessage', $this->channel->getCipherParams(), $this->channel->getPath() . '/presence', $params );
    }

    /**
     * Retrieves channel's history of presence data
     * @param array $params Parameters to be sent with the request
     * @return PaginatedResource
     */
    public function history( $params = array() ) {
        return new PaginatedResource( $this->ably, 'Ably\Models\PresenceMessage', $this->channel->getCipherParams(), $this->channel->getPath() . '/presence/history', $params );
    }
}