<?php
namespace Doit\Aliyun;
final class Aliyun
{
    public      static  AliyunConfig    $aliyunConfigDefault;
    protected           AliyunConfig    $aliyunConfig;
    protected           AliyunModel     $aliyunModel;
    /**
     * @throws AliyunException
     */
    public function __construct(AliyunConfig $aliyunConfig = null)
    {
        if($aliyunConfig == null)
        {
            if(isset(Aliyun::$aliyunConfigDefault)){
                $aliyunConfig = Aliyun::$aliyunConfigDefault;
            }else{
                throw new AliyunException("not initialize configure");
            }
        }
        $this->aliyunConfig = $aliyunConfig;
    }

    public function inject(aliyunModel $aliyunModel): Aliyun
    {
        $this->aliyunModel = $aliyunModel;
        $this->aliyunModel->setAliyunConfig($this->aliyunConfig);
        $this->aliyunModel->nonce()->timePoint();
        return $this;
    }
    public function apply():AliyunResult
    {

        return $this->aliyunModel->trade();
    }


    /**
     * @param string $AccessKeyId 阿里云访问密钥ID
     * @param string $AccessKeySecret 阿里云访问密钥
     * @return Aliyun
     * @throws AliyunException
     */
    public static function bind(string $AccessKeyId , string $AccessKeySecret): Aliyun
    {
        $config = new AliyunConfig();
        $config->AccessKeyId = $AccessKeyId;
        $config->AccessKeySecret = $AccessKeySecret;
        return new self($config);
    }

}