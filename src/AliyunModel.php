<?php

namespace Doit\Aliyun;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Client\Request;

abstract class AliyunModel
{
    private AliyunConfig $aliyunConfig;
    private string $RequestMethod = 'GET';
    /** @var string 阿里云访问密钥ID。 */
    public string $AccessKeyId;
    /** @var string API的名称 */
    public string $Action;
    /** @var string 请求的时间戳。按照ISO8601标准表示，并需要使用UTC时间 */
    public string $Timestamp;
    /** @var string 签名唯一随机数。用于防止网络重放攻击，建议您每一次请求都使用不同的随机数。 */
    public string $SignatureNonce;
    /** @var string 签名方式。目前为固定值 HMAC-SHA1 */
    public string $SignatureMethod = 'HMAC-SHA1';
    /** @var string 签名算法版本。目前为固定值 1.0*/
    public string $SignatureVersion = '1.0';
    /** @var string 请求签名，用户请求的身份验证。详细签名机制，请参见签名机制。 */
    public string $Signature;
    /** @var string 指定接口返回数据的格式 */
    public string $Format = 'JSON';




    public string $Version = '2017-05-25';

    abstract function trade():AliyunResult;

    public function sign($params): static
    {

        ksort($params);
        $signString = $this->RequestMethod.'&%2F&'.urlencode(http_build_query($params));
        $this->Signature = base64_encode(hash_hmac(
            'sha1',
            $signString,
            $this->aliyunConfig->AccessKeySecret.'&',
            true));


        return $this;
    }

    public function nonce(): static
    {
        $this->SignatureNonce = time().sprintf('%03d',rand(0,999));
        return $this;
    }

    public function timePoint(): static
    {
        $this->Timestamp = date('Y-m-d\TH:i:s\Z',time());
        return $this;
    }

    /**
     * @param AliyunConfig $aliyunConfig
     */
    public function setAliyunConfig(AliyunConfig $aliyunConfig): void
    {
        $this->aliyunConfig = $aliyunConfig;
        $this->AccessKeyId = $this->aliyunConfig->getAccessKeyId();
    }


    /**
     * @throws GuzzleException
     */
    public function request(mixed $data): AliyunResult
    {
        return $this->requestGet($this->aliyunConfig->endPoint(),$data);
    }

    /**
     *
     * @throws GuzzleException
     */
    private function requestGet(string $endPoint,$query = null): AliyunResult
    {
        $response = (new Client())->request('get',$endPoint,[
            'query'=>$query,
            'http_errors' => false
        ]);

        $result = json_decode($response->getBody()->getContents());

        return $this->stdClassCover($result,new AliyunResult());
    }

    /**
     *
     */
    private function requestPost(): void
    {

    }


    private function stdClassCover(object $origin,AliyunResult $steam):AliyunResult
    {
        foreach ($origin as $key =>$val)
        {
            $steam->$key = $origin->$key;
        }
        return $steam;

    }

}