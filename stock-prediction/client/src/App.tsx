import React, { useState, useEffect } from 'react';
import { StockChart } from './components/StockChart';
import { StockSelector } from './components/StockSelector';
import { PredictionCard } from './components/PredictionCard';
import { StockInfo } from './components/StockInfo';
import { StockData, PredictionData, StockMetadata } from './types/stock';
import { websocketService } from './services/websocketService';
import companiesData from './data/companies.json';

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

  // Temporary mock prediction data
    const mockPredictionData: PredictionData[] = Array.from({ length: 8 }, (_, i) => ({
    timestamp: Date.now() + i * 86400000, // Daily intervals
    predictedPrice: 240 + Math.random() * 60, // Random value between 240 and 300
    confidence: 0.7 + Math.random() * 0.2,
  }));

  const handleStockSelect = (symbol: string) => {
    setSelectedStock(symbol);
  };

  useEffect(() => {
    websocketService.connect(selectedStock, (newDataArray) => {
      setHistoricalData(newDataArray);
        
      // Update metadata using the latest price
      if (newDataArray.length > 0) {
        const currentPrice = newDataArray[0].price;
        const previousPrice = newDataArray[1]?.price || currentPrice;
        const change = currentPrice - previousPrice;
        const changePercent = (change / previousPrice) * (100);
        const companyName = companiesData[selectedStock]?.name || 'Unknown';

        setMetadata(prev => ({
          ...prev,
          symbol: selectedStock,
          companyName,
          currentPrice,
          change,
          changePercent,
        }));
      }
    });

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