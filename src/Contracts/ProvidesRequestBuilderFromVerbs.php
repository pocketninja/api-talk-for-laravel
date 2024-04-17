<?php

namespace PocketNinja\ApiTalk\Contracts;

interface ProvidesRequestBuilderFromVerbs
{
    public function get(): BuildsRequests;

    public function post(): BuildsRequests;
}
