import pytube

url = "https://www.youtube.com/watch?v=Dvzg5Nl2gF0"
path = r"C:\Users\owner\Desktop\React\CSC293_Project\Videos"
pytube.YouTube(url).streams.get_highest_resolution().download(path)
print("Downloaded")