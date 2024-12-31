import requests
import json
url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=BFZH9MBS4WTBKG11'
r = requests.get(url)
data = r.json()

with open("stock_data.json", "w") as json_file:
    json.dump(data, json_file, indent=4)
