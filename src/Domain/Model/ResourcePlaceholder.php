<?php

namespace Nordkirche\Ndk\Domain\Model;

use Nordkirche\Ndk\Api;
use Nordkirche\Ndk\Service\Exception\NdkException;

/**
 * Object is used when a resource could not be found.
 *
 * Case may be the application has a relation to a list of resources with NAPI URLs but one resource is not available
 * anymore, usually resulting in an exception. In this case we want the list entries to be resolved as complete
 * as possible and resources not available replaced with this placeholder object.
 *
 * The developer can now use a generic approach to handle missing items/relations to a resource, without being
 * interrupted by an exception.
 *
 */
class ResourcePlaceholder extends AbstractResourceObject
{
    /**
     * @var NdkException
     */
    private $linkedException = null;

    public function getLabel(): string
    {
        return Api::$api->getConfiguration()->getPlaceholderLabelClosure()($this);
    }

    public function getLinkedException(): NdkException
    {
        return $this->linkedException;
    }

    public function setLinkedException(NdkException $linkedException)
    {
        $this->linkedException = $linkedException;
    }
}
