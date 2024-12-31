from script import generate_stock_data
from fastapi import FastAPI, WebSocket, WebSocketDisconnect
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import json
import asyncio

app = FastAPI()

# Enable CORS
origins = ['http://localhost:3000']
app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=['*'],
    allow_headers=['*'],
)

class TickerModel(BaseModel):
    ticker: str
@app.post("/api/ticker")
async def get_data(input_data: TickerModel):
    results = generate_stock_data(input_data.ticker)
    return {"result":results}


@app.websocket("/ws")
async def websocket_endpoint(websocket: WebSocket):
    await websocket.accept()  # Accept the WebSocket connection
    try:
        while True:
            # Wait for the client to send the ticker symbol
            data = await websocket.receive_text()
            
            # Parse the incoming message, which should be a ticker symbol
            try:
                message = json.loads(data)
                ticker = message.get("ticker")  # Get the ticker symbol from the message
                
                if not ticker:
                    await websocket.send_text(json.dumps({"error": "No ticker symbol provided."}))
                    continue

                # Generate stock data for the provided ticker symbol
                stock_data = generate_stock_data(ticker)
                # Send back the generated stock data as JSON
                await websocket.send_text(json.dumps(stock_data))
                
            except json.JSONDecodeError:
                await websocket.send_text(json.dumps({"error": "Invalid JSON received."}))
            
            await asyncio.sleep(1)  # Sleep for 1 second (could be adjusted)
    
    except WebSocketDisconnect:
        print("Client disconnected")