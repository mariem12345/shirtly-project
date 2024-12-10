<?php

namespace App\Service;

class BaseUrl
{
    private $requestStack;

    /**
     * @param $requestStack
     */
    public function __construct($requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getBaseUrl(): string
    {
        $request = $this->requestStack->getCurrentRequest();
        return $request ? $request->getSchemeAndHttpHost() : '';
    }


}