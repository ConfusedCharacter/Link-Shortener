import requests

#
#
# shorturl.at WebService
# By Confused Character
# github https://github.com/ConfusedCharacter/
# 
#

def shorturl(url):
    headers = {
        'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.5359.125 Safari/537.36',
        'content-type': 'application/x-www-form-urlencoded',
        'origin': 'https://www.shorturl.at',
        'referer': 'https://www.shorturl.at/',
        'Accept-Language': 'en-US,en;q=0.9'
    }
    request = requests.post(
        "https://www.shorturl.at/shortener.php",
        data="u="+url,
        headers=headers
    )
    return request.text.split('id="shortenurl" type="text" value="')[1].split('"')[0]

print(shorturl("https://google.com"))