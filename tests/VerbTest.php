<?php

use PocketNinja\ApiTalk\Enums\Verb;
use PocketNinja\ApiTalk\Exceptions\IncompatibleVerb;

it('cannot verb "to get"', function () {
    Verb::GET->assertCanVerbTo();
})->expectException(IncompatibleVerb::class);

it('cannot verb "to delete"', function () {
    Verb::DELETE->assertCanVerbTo();
})->expectException(IncompatibleVerb::class);

it('cannot verb "from post"', function () {
    Verb::POST->assertCanVerbFrom();
})->expectException(IncompatibleVerb::class);

it('cannot verb "from put"', function () {
    Verb::PUT->assertCanVerbFrom();
})->expectException(IncompatibleVerb::class);

it('cannot verb "from patch"', function () {
    Verb::PATCH->assertCanVerbFrom();
})->expectException(IncompatibleVerb::class);

it('can verb "to post"', function () {
    Verb::POST->assertCanVerbTo();
})->throwsNoExceptions();

it('can verb "to put"', function () {
    Verb::PUT->assertCanVerbTo();
})->throwsNoExceptions();

it('can verb "to patch"', function () {
    Verb::PATCH->assertCanVerbTo();
})->throwsNoExceptions();

it('can verb "from get"', function () {
    Verb::GET->assertCanVerbFrom();
})->throwsNoExceptions();

it('can verb "from delete"', function () {
    Verb::DELETE->assertCanVerbFrom();
})->throwsNoExceptions();
