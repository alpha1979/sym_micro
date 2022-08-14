<?php 


namespace App\Service\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;

class DTOSerializer implements SerializerInterface
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer(
            [ new ObjectNormalizer( 
                classMetadataFactory: new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader())),
                nameConverter: new CamelCaseToSnakeCaseNameConverter())],
            [new JsonEncoder()]
        );
    }
    function serialize(mixed $data, string $format, array $context = array()): string
    {
        return $this->serializer->serialize($data, $format, $context);
    }
    function deserialize(mixed $data, string $type, string $format, array $context = array()): mixed
    {
        return $this->serializer->deserialize($data,$type, $format, $context);
    }
}   