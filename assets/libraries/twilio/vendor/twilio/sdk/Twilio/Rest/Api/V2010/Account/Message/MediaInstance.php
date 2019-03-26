<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Message;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string contentType
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string parentSid
 * @property string sid
 * @property string uri
 */
class MediaInstance extends InstanceResource {
    /**
     * Initialize the MediaInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The unique sid that identifies this account
     * @param string $messageSid A string that uniquely identifies this message
     * @param string $sid Fetch by unique media Sid
     * @return \Twilio\Rest\Api\V2010\Account\Message\MediaInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $messageSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'contentType' => Values::array_get($payload, 'content_type'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'parentSid' => Values::array_get($payload, 'parent_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'uri' => Values::array_get($payload, 'uri'),
        );

        $this->solution = array(
            'accountSid' => $accountSid,
            'messageSid' => $messageSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Message\MediaContext Context for this
     *                                                             MediaInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new MediaContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['messageSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Deletes the MediaInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a MediaInstance
     * 
     * @return MediaInstance Fetched MediaInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.MediaInstance ' . implode(' ', $context) . ']';
    }
}