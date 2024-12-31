import React, { useState,useEffect } from 'react';
import { StockChart } from './components/StockChart';
import { StockSelector } from './components/StockSelector';
import { PredictionCard } from './components/PredictionCard';
import { StockInfo } from './components/StockInfo';
import { StockData, PredictionData, StockMetadata } from './types/stock';
import { websocketService } from './services/websocketService';




function App() {
  const [selectedStock, setSelectedStock] = useState('AAPL');
  const [historicalData, setHistoricalData] = useState<StockData[]>([]);
  const [metadata, setMetadata] = useState<StockMetadata>({
    symbol: 'AAPL',
    companyName: 'Apple Inc.',
    currentPrice: 0,
    change: 0,
    changePercent: 0,
  });

  // Temporary mock prediction data - replace with actual API calls
  const mockPredictionData: PredictionData[] = Array.from({ length: 8 }, (_, i) => ({
    timestamp: Date.now() + i * 3600000,
    predictedPrice: 155 + Math.random() * 10,
    confidence: 0.7 + Math.random() * 0.2,
  }));
  const handleStockSelect = (symbol: string) => {
    setSelectedStock(symbol);
    // Here you would typically fetch new data for the selected stock
  };
  useEffect(() => {
    // Connect to WebSocket when stock changes
    websocketService.connect(selectedStock, (newData) => {
      setHistoricalData(prevData => {
        // Keep last 24 hours of data
        const updatedData = [...prevData, newData].slice(-24);
        console.log(updatedData);
        
        // Update metadata
        if (updatedData.length > 0) {
          const currentPrice = newData.price;
          const previousPrice = prevData[prevData.length - 1]?.price || currentPrice;
          const change = currentPrice - previousPrice;
          const changePercent = (change / previousPrice) * 100;
          
          setMetadata(prev => ({
            ...prev,
            symbol: selectedStock,
            currentPrice,
            change,
            changePercent,
          }));
        }
        
        return updatedData;
      });
    });

    // Cleanup on unmount or when stock changes
    return () => {
      websocketService.disconnect();
    };
  }, [selectedStock]);

  return (
    <div className="min-h-screen bg-gray-100">
      <header className="bg-white shadow-sm">
        <div className="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
          <h1 className="text-2xl font-bold text-gray-900">Stock Analysis & Prediction</h1>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div className="mb-8">
          <StockSelector onSelectStock={handleStockSelect} />
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-4 gap-6">
          <div className="lg:col-span-3 space-y-6">
            <StockInfo metadata={metadata} />
            <StockChart 
              historicalData={historicalData}
              predictionData={mockPredictionData}
            />
          </div>
          
          <div className="lg:col-span-1">
            <PredictionCard
              latestPrediction={mockPredictionData[0]}
              currentPrice={metadata.currentPrice}
            />
          </div>
        </div>
      </main>
    </div>
  );
}

export default App;
