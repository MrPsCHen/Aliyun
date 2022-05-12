<?php

namespace Doit\Aliyun;

class AliyunConfig
{
    /** @var string 请求协议 */
    public string $Protocol         = 'https';
    /** @var string 网关 */
    public string $Gateway          = 'dysmsapi.aliyuncs.com';
    /** @var string API的名称。您可以访问阿里云OpenAPI开发者门户，搜索您想调用的 OpenAPI */
    public string $Action           = '';
    /** @var string API 版本。您可以访问阿里云OpenAPI开发者门户，查看您调用 OpenAPI 对应的 API 版本 */
    public string $Version          = '';
    /** @var string 指定接口返回数据的格式。可以选择 JSON 或者 XML。默认为 XML。 */
    public string $Format           = 'JSON';
    /** @var string 阿里云访问密钥ID。您可以在RAM 控制台 查看您的 AccessKeyId。如需创建 AccessKey，请参见创建 AccessKey */
    public string $AccessKeyId      = '';

    public string $AccessKeySecret  = '';


    public function endPoint(): string
    {
        return $this->Protocol.'://'.$this->Gateway;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->Action;
    }

    /**
     * @param string $Action
     */
    public function setAction(string $Action): void
    {
        $this->Action = $Action;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->Version;
    }

    /**
     * @param string $Version
     */
    public function setVersion(string $Version): void
    {
        $this->Version = $Version;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->Format;
    }

    /**
     * @param string $Format
     */
    public function setFormat(string $Format): void
    {
        $this->Format = $Format;
    }

    /**
     * @return string
     */
    public function getAccessKeyId(): string
    {
        return $this->AccessKeyId;
    }

    /**
     * @param string $AccessKeyId
     */
    public function setAccessKeyId(string $AccessKeyId): void
    {
        $this->AccessKeyId = $AccessKeyId;
    }

    /**
     * @return string
     */
    public function getSignatureMethod(): string
    {
        return $this->SignatureMethod;
    }

    /**
     * @param string $SignatureMethod
     */
    public function setSignatureMethod(string $SignatureMethod): void
    {
        $this->SignatureMethod = $SignatureMethod;
    }

    /**
     * @return string
     */
    public function getSignatureVersion(): string
    {
        return $this->SignatureVersion;
    }

    /**
     * @param string $SignatureVersion
     */
    public function setSignatureVersion(string $SignatureVersion): void
    {
        $this->SignatureVersion = $SignatureVersion;
    }



}