<?php
namespace Webdock\Entity;

trait Validator
{
    public function isIPv4(string $input)
    {
        return filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    public function isIPv6(string $input)
    {
        return filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }

    public function isAlphaNum(string $input)
    {
      return ctype_alnum($string);
    }

    public function isAlpha($string $input)
    {
      return ctype_alpha($input);
    }

    
}
