import requests

# URL to send the POST request to
url = 'http://127.0.0.1:8000/'

# Data to send with the POST request
data = {
    'product_id': 2,
    'name': 'Sample Product',
    'price': 100,
    'image': 'image.jpg',
    'quantity': 1
}

# Include the CSRF token in headers if needed (you can retrieve it from your Laravel app)
headers = {
    'X-CSRF-TOKEN': '7MVQIcHX7rqWibomTOd7HDEL6cSQ2uAuBm41psWF',  # Make sure to replace this with the actual CSRF token
    'Content-Type': 'application/json'
}

# Make the POST request
response = requests.post(url, json=data, headers=headers)

# Check the response status code and content
if response.status_code == 200:
    print('Success:', response.json())  # Prints the response from the server
else:
    print('Error:', response.status_code, response.text)  # Prints the error if the request failed
