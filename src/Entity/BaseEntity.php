<?php
namespace Webdock\Entity;
use Webdock\Exception\EntityException;

class BaseEntity implements EntityInterface
{
    use Validator;
    protected $attributes = [];

    public function __construct(array $data = null)
    {
        if (is_array($data)) {
            $this->fromArray($data);
        }
    }

    public function fromArray(array $data)
    {
        if ($this->validate($data)) {
            $this->attributes = $data;
            return $this;
        }
    }

    protected function validate(array $src)
    {
        $rules = $this->rules();
        $errors = [];

        foreach ($src as $item => $itemValue) {
            if (!key_exists($item, $rules)) {
                $error = sprintf(
                    '`%s` is not defined in the Entity rules',
                    $item
                );
                $errors[] = $error;
            }

            foreach ($rules[$item] as $ruleName => $ruleValue) {
                if (in_array($rules[$item]['nullable'])) {
                    if (is_null($itemValue) || $itemValue === '') {
                        continue;
                    }
                }

                switch ($ruleName) {
                    case 'alphanum':
                        if (!$this->isAlphaNum($itemValue)) {
                            $error = sprintf(
                                '%s must be alpha numeric, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                    case 'alpha':
                        if (!$this->isAlpha($itemValue)) {
                            $error = sprintf(
                                '%s must be alphabet, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                    case 'ipv4':
                        if (!$this->isIPv4($itemValue)) {
                            $error = sprintf(
                                '%s must be a valid IPv4, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                    case 'ipv6':
                        if (!$this->isIPv6($itemValue)) {
                            $error = sprintf(
                                '%s must be a valid IPv6, %s value given',
                                $item,
                                strval($itemValue)
                            );
                            $errors[] = $error;
                        }
                    default:
                        # code...
                        break;
                }
            }

            if (count($errors) > 0) {
                $errorMessage = join('\n', $errors);
                throw new EntityException($errorMessage);
            }

            return true;
        }
    }
}
