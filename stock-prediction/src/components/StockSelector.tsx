import React from 'react';
import { Search } from 'lucide-react';

interface StockSelectorProps {
  onSelectStock: (symbol: string) => void;
}

const popularStocks = ['AAPL', 'GOOGL', 'MSFT', 'AMZN', 'TSLA'];

export function StockSelector({ onSelectStock }: StockSelectorProps) {
  return (
    <div className="w-full max-w-md">
      <div className="relative">
        <input
          type="text"
          placeholder="Enter stock symbol..."
          className="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          onChange={(e) => onSelectStock(e.target.value.toUpperCase())}
        />
        <Search className="absolute right-3 top-2.5 text-gray-400" size={20} />
      </div>
      <div className="mt-2 flex flex-wrap gap-2">
        {popularStocks.map((stock) => (
          <button
            key={stock}
            onClick={() => onSelectStock(stock)}
            className="px-3 py-1 text-sm bg-gray-100 hover:bg-gray-200 rounded-full transition-colors"
          >
            {stock}
          </button>
        ))}
      </div>
    </div>
  );
}