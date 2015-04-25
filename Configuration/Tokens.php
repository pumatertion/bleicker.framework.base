<?php

use App\Security\Token\ParameterToken;
use Bleicker\Token\TokenManager;

TokenManager::registerPrototypeToken(ParameterToken::class, new ParameterToken());
