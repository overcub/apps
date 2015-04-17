# coding: utf-8
import requests
from bs4 import BeautifulSoup
from persistencia_mongo import database

RIO_DE_JANEIRO = 26
SAO_PAULO = 182

base_url = "https://www.drinkadvisor.com"
city_page = "/bars/showCityBars"
payload = {
    "offset": 0,
    "city_id": SAO_PAULO
}

# user: baraprova-user
# password: jfydJJVV

headers = {
    "x-newrelic-id": "UwcPVlJbGwAEVFlaDwQ",
    "accept-encoding": "gzip, deflate, sdch",
    "x-requested-with": "XMLHttpRequest",
    "accept-language": "en-US,en;q=0.8",
    "user-agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36",
    "referer": "https://www.drinkadvisor.com/en/bars/rio-de-janeiro.html"
}

def get_html(offset=0):
    payload["offset"] = offset
    response = requests.get(base_url + city_page, params=payload, headers=headers)
    return response.text

def parse_html_data(html):
    soup = BeautifulSoup(html)
    for html_data in soup.find_all("div", class_="act-sld"):
        data = html_data_to_json(html_data)
        save_data_to_mongo(data)

def html_data_to_json(html_data):
    json_data = {
        "city_id": payload["city_id"],
        "image": html_data.find("img")["src"], 
        "name": html_data.find("div", class_="titn2").string, 
        "address": html_data.find("span").string,
        "link": base_url + html_data.find("a")["href"]
    }

    return json_data

def save_data_to_mongo(data):
    bars = database["bars"]
    return bars.insert_one(data).inserted_id


def save_data_to_file(data, city_id):
    file = open("response-%s.txt" % city_id, "a")
    file.write(data.encode('utf-8'))
    file.close()

try:
    for x in xrange(0,100):
        html = get_html(x * 6)
        
        if len(html) == 0:
            raise Exception("Crawler terminado")
        
        data = parse_html_data(html)
        print data
except Exception, e:
    print e