<?php

namespace App\Constant;

/**
 * Class Constants
 * @package App\Constants
 */
class Constant
{
    /**
     * Boolean status code
     */
    public const STATUS_ZERO = 0;
    public const STATUS_ONE = 1;
    public const STATUS_TWO = 2;
    public const STATUS_THREE = 3;
    public const STATUS_FOUR = 4;
    public const STATUS_FIVE = 5;
    public const STATUS_SIX = 6;
    public const STATUS_TEN = 10;
    public const STATUS_TRUE = true;
    public const STATUS_FALSE = false;
    public const NULL = null;
    public const EMPTY_STRING = "";
    public const EMPTY_ARRAY = [];

    /**
     * Entity Status
     */
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'In-active';

    /**
     * Typographical Symbols
     */
    public const BACK_SLASH = '\\';
    public const SLASH = '/';
    public const UNDERSCORE = '_';
    public const HYPHEN = '-';
    public const AT_SIGN = '@';
    public const SPACE = ' ';

    /**
    * Error Codes
    */
    public const CODE_200 = 200;
    public const CODE_401 = 401;
    public const CODE_403 = 403;
    public const CODE_404 = 404;
    public const CODE_422 = 422;
    public const CODE_500 = 500;
    public const CODE_409 = 409;

    /**
     * Date format
     */
    public const DATE_FORMAT = 'd-m-Y';
    public const DATE_TIME_FORMAT = 'Y-m-d H:i:s';
    public const TIME_FORMAT = 'H:i:s';

    /**
     * Database
     */
    public const DB = 'db';

    /**
     * Suscriptions
     */
    public const FREE_PLAN = 'Free';

    /**
     * Open AI
     */
    public const AI_MODEL = 'text-davinci-003';
    public const AI_PROMPT = 'Give me well optimised query of ';
    public const AI_TEMPERATURE = 0.3;
    public const AI_MAX_TOKENS = 600;
    public const AI_TOP_P = 1.0;
    public const AI_FREQUENCY_PENALTY = 0.0;
    public const AI_PRESENCE_PENALTY = 0.0;
}
