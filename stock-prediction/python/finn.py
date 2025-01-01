import websocket
import asyncio
import json
from typing import Optional, Callable

class FinnhubWebSocket:
    def __init__(self, token):
        self.token = token
        self.ws: Optional[websocket.WebSocketApp] = None
        self.callback: Optional[Callable] = None
        
    def set_callback(self, callback):
        self.callback = callback

    def on_message(self, ws, message):
        if self.callback:
            try:
                data = json.loads(message)
                if data["type"] == "trade":
                    for trade in data["data"]:
                        formatted_data = {
                            "timestamp": trade["t"],
                            "price": trade["p"],
                            "volume": trade["v"]
                        }
                        self.callback(json.dumps(formatted_data))
            except Exception as e:
                print(f"Error processing message: {e}")
        
    def on_error(self, ws, error):
        print(f"Error: {error}")
        
    def on_close(self, ws):
        print("Connection closed")
        
    def on_open(self, ws):
        ws.send(f'{{"type":"subscribe","symbol":"{self.ticker}"}}')
        
    async def connect(self, ticker, callback=None):
        self.ticker = ticker
        if callback:
            self.callback = callback
            
        websocket.enableTrace(True)
        self.ws = websocket.WebSocketApp(
            f"wss://ws.finnhub.io?token={self.token}",
            on_message=self.on_message,
            on_error=self.on_error,
            on_close=self.on_close)
        self.ws.on_open = self.on_open
        
        loop = asyncio.get_event_loop()
        await loop.run_in_executor(None, self.ws.run_forever)
        
    def disconnect(self):
        if self.ws:
            self.ws.close()

async def test():
    def print_callback(message):
        print(message)
        
    fin = FinnhubWebSocket("ctpu9bhr01qmn6h32k6gctpu9bhr01qmn6h32k70")
    await fin.connect("AAPL", print_callback)
if __name__ == "__main__":
    asyncio.run(test())
# message = {
#   "data": [
#     {
#       "p": 7296.89,
#       "s": "BINANCE:BTCUSDT",
#       "t": 1575526691134,
#       "v": 0.011467
#     }
#   ],
#   "type": "trade"
# }
# print(message["data"][0]['p'])