require 'net/http'

def getWeather
  url = "http://mat1.qq.com/weather/inc/minisite2_252.js";
  ret = Net::HTTP.get(URI(url));
  return ret;
end

def matchSTR(data)
  ec = Encoding::Converter.new("gbk", "UTF-8")
  str = ec.convert(data)
  str = /([^a-zA-Z0-9=_"\s]).*(?=")/.match(str)
  return str[0];
end

def sendFetion(str)
  url = "http://quanapi.sinaapp.com/fetion.php?u=15901965812&p=hb25524289&to=15901965812&m="+URI.escape(str);
  ret = Net::HTTP::get(URI(url))
end

data  = getWeather
str = matchSTR(data);
sendFetion(str);
