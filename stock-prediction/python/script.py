from datetime import datetime
import requests
import json
def get_results(ticker):
    url = f'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={ticker}&interval=60min&outputsize=compact&apikey=BFZH9MBS4WTBKG11'
    r = requests.get(url)
    data = r.json()
    date_format = "%Y-%m-%d %H:%M:%S"
    time_series = data[r"Time Series (60min)"]
    results = []
    i = 0
    for key, value in time_series.items():
        if i < 24:
            key_datetime = datetime.strptime(key, date_format)
            timestamp = int(key_datetime.timestamp())
            temp_dict = {"timestamp": timestamp,
                        "price": value["4. close"],
                        "volume": value["5. volume"]}
            results.append(temp_dict)
            i += 1
    
    return results
