import os
import requests
from bs4 import BeautifulSoup

url = r"https://www.hermes.com/us/en/"
response = requests.get(url)
soup = BeautifulSoup(response.text, 'html.parser')

# Save the main HTML file
with open("example.html", "w", encoding="utf-8") as file:
    file.write(soup.prettify())

# Save linked assets (basic example for images)
os.makedirs("assets", exist_ok=True)
for img in soup.find_all("img"):
    img_url = img.get("src")
    if img_url:
        img_data = requests.get(img_url).content
        filename = os.path.join("assets", os.path.basename(img_url))
        with open(filename, "wb") as img_file:
            img_file.write(img_data)
