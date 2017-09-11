<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-08-28
 * Time: 14:31
 */

namespace Inhere\Http;

/**
 * Class RequestBody
 *   Provides a PSR-7 implementation of a reusable raw request body
 * @package Inhere\Http
 */
class RequestBody extends Body
{
    /**
     * Create a new RequestBody.
     * @param null|string $content
     */
    public function __construct($content = null)
    {
        $stream = fopen('php://temp', 'wb+');
        stream_copy_to_stream(fopen('php://input', 'rb'), $stream);
        rewind($stream);

        parent::__construct($stream);

        if ($content) {
            $this->write($content);
        }
    }
}