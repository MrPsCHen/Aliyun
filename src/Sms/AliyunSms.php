<?php
namespace Doit\Aliyun\Sms;
use Doit\Aliyun\AliyunModel;
use Doit\Aliyun\AliyunResult;
use GuzzleHttp\Exception\GuzzleException;

class AliyunSms extends AliyunModel
{
    public string $Action = 'SendSms';
    /**
     * @var string 接收短信的手机号码
     */
    public string $PhoneNumbers;

    /**
     * @var string 短信签名名称。
     */
    public string $SignName;

    /**
     * @var string 短信模板 Code 。
     */
    public string $TemplateCode;

    /**
     * @var string 短信模板变量对应的实际值，JSON格式
     */
    public string $TemplateParam;

    /**
     * @var string 上行短信扩展码
     */
    public string $SmsUpExtendCode;

    /** @var string 外部流水扩展字段。 */
    public string $OutId;

    /**
     * @return AliyunResult
     * @throws GuzzleException
     */
    function trade(): AliyunResult
    {
        $this->sign(get_object_vars($this));
        return $this->request(get_object_vars($this));
    }

    /**
     * 接收短信的手机号码
     * @param string $PhoneNumbers
     * @return AliyunSms
     */
    public function setPhoneNumbers(string $PhoneNumbers): static
    {
        $this->PhoneNumbers = $PhoneNumbers;
        return $this;
    }

    /**
     * 短信签名名称。
     * @param string $SignName
     * @return AliyunSms
     */
    public function setSignName(string $SignName): static
    {
        $this->SignName = $SignName;
        return $this;
    }

    /**
     * 短信模板 Code 。
     * @param string $TemplateCode
     * @return AliyunSms
     */
    public function setTemplateCode(string $TemplateCode): static
    {
        $this->TemplateCode = $TemplateCode;
        return $this;
    }

    /**
     * 短信模板变量对应的实际值，JSON格式
     * @param string $TemplateParam
     * @return AliyunSms
     */
    public function setTemplateParam(mixed $TemplateParam): static
    {
        if(is_string($TemplateParam))
            $this->TemplateParam = $TemplateParam;
        else if(is_array($TemplateParam) || is_object($TemplateParam))
            $this->TemplateParam = json_encode((array)$TemplateParam);
        return $this;
    }

    /**
     * 上行短信扩展码
     * @param string $SmsUpExtendCode
     * @return AliyunSms
     */
    public function setSmsUpExtendCode(string $SmsUpExtendCode): static
    {
        $this->SmsUpExtendCode = $SmsUpExtendCode;
        return $this;
    }

    /**
     * 外部流水扩展字段。
     * @param string $OutId
     * @return AliyunSms
     */
    public function setOutId(string $OutId): static
    {
        $this->OutId = $OutId;
        return $this;
    }




}