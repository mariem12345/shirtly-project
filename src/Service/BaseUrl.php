<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class BaseUrl
{
    private RequestStack $requestStack;

    /**
     * @param $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getBaseUrl(): string
    {
        $request = $this->requestStack->getCurrentRequest();
        return $request ? $request->getSchemeAndHttpHost() : '';
    }


}