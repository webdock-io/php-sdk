<?php
namespace Webdock\Entity;
use Webdock\Exception\EntityException;
use DateTime;

trait Validator
{
    public function isIPv4($input)
    {
        return filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    public function isIPv6($input)
    {
        return filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }

    public function isInt64($input)
    {
        return ctype_digit((string) $input);
    }

    public function isAlphaNum($input)
    {
        return ctype_alnum($input);
    }

    public function isAlpha($input)
    {
        return ctype_alpha($input);
    }

    public function isValidName($input)
    {
        return preg_match('/^[a-zA-Z0-9 \s]+$/', $input) ? true : false;
    }

    protected function validate(array $src)
    {
        $rules = $this->rules();
        $errors = [];

        $unlistedRules = array_diff_key($rules, $src);

        if (count($unlistedRules) > 0) {
            foreach ($unlistedRules as $unlistedKey => $unlisted) {
                if (array_key_exists('default', $unlisted)) {
                    $src[$unlistedKey] = $unlisted['default'];
                    continue;
                }

                if (!in_array('nullable', $unlisted)) {
                    $error = sprintf(
                        '`%s` parameter is required.',
                        $unlistedKey
                    );
                    $errors[] = $error;
                }
            }
        }

        foreach ($src as $item => $itemValue) {
            if (!key_exists($item, $rules)) {
                $error = sprintf(
                    '`%s` is not defined in the Entity rules',
                    $item
                );
                $errors[] = $error;
                continue;
            }

            if (in_array('default', $rules[$item])) {
                if (is_null($itemValue) || $itemValue === '') {
                    $itemValue = $rules[$item]['default'];
                }
            }

            if (in_array('nullable', $rules[$item])) {
                if (is_null($itemValue) || $itemValue === '') {
                    continue;
                }
            }

            foreach ($rules[$item] as $ruleName => $ruleValue) {
                $rule = is_string($ruleName) ? $ruleName : $ruleValue;

                switch ($rule) {
                    case 'name':
                        if (!$this->isValidName($itemValue)) {
                            $error = sprintf(
                                '%s must satisfy [a-zA-Z0-9 \s] rule',
                                $item
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'int64':
                        if (!$this->isInt64($itemValue)) {
                            $error = sprintf(
                                '%s is not a valid int64, `%s` value given.',
                                $item,
                                $itemValue
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'string':
                        if (!is_string($itemValue)) {
                            $error = sprintf(
                                '%s must be a string variable',
                                $item
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'boolean':
                        if (!is_bool($itemValue)) {
                            $error = sprintf(
                                '%s is not a boolean value',
                                $item
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'alphanum':
                        if (!$this->isAlphaNum($itemValue)) {
                            $error = sprintf(
                                '%s must be alpha numeric, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'alpha':
                        if (!$this->isAlpha($itemValue)) {
                            $error = sprintf(
                                '%s must be alphabet, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'ipv4':
                        if (!$this->isIPv4($itemValue)) {
                            $error = sprintf(
                                '%s must be a valid IPv4, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'ipv6':
                        if (!$this->isIPv6($itemValue)) {
                            $error = sprintf(
                                '%s must be a valid IPv6, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'minLength':
                        if (strlen($itemValue) < $ruleValue) {
                            $error = sprintf(
                                '%s must be more than %s',
                                $item,
                                strlen($ruleValue)
                            );
                            $errors[] = $error;
                        }
                        break;

                    case 'maxLength':
                        if (strlen($itemValue) > $ruleValue) {
                            $error = sprintf(
                                '%s must be less than %s',
                                $item,
                                strlen($ruleValue)
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'enum':
                        if (!in_array($itemValue, $ruleValue)) {
                            $error = sprintf('%s is invalid value', $item);
                            $errors[] = $error;
                        }
                        break;
                    case 'shell_username':
                        $val = str_replace(['_'], '', $itemValue);
                        if (!$this->isAlphaNum($val)) {
                            $error = sprintf(
                                '%s is not a valid shell username',
                                $itemValue
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'shell_password':
                        $val = str_replace(['-', '_'], '', $itemValue);
                        if (!$this->isAlphaNum($val)) {
                            $error = sprintf(
                                '%s is not a valid shell password',
                                $itemValue
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'arrayOfInt':
                        if (!is_array($itemValue)) {
                            $error = sprintf('%s must be array.', $item);
                            $errors[] = $error;
                            break;
                        }
                        $intValues = array_map(function ($val) {
                            return $this->isInt64($val);
                        }, $itemValue);

                        if (in_array(false, $intValues)) {
                            $error = sprintf(
                                '%s value of array must be integer',
                                $item
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'arrayOfString':
                        if (!is_array($itemValue)) {
                            $error = sprintf('%s must be array.', $item);
                            $errors[] = $error;
                            break;
                        }
                        $stringValues = array_map(function ($value) {
                            return is_string($value);
                        }, $itemValue);
                        if (in_array(false, $stringValues)) {
                            $error = sprintf(
                                '%s value of array must be string.',
                                $item
                            );
                            $errors[] = $error;
                        }
                        break;
                    case 'datetime':
                        if ((bool) strtotime($itemValue) === false) {
                            $error = sprintf(
                                '%s is not a valid datetime string',
                                $item
                            );
                            $errors[] = $error;
                            break;
                        }
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }

        if (count($errors) > 0) {
            $errorMessage = join("\n", $errors);
            throw new EntityException($errorMessage);
        }

        return true;
    }
}
