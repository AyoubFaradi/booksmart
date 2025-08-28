import requests
from bs4 import BeautifulSoup
import pandas as pd
from urllib.parse import urljoin

BASE_URL = "https://books.toscrape.com/"

def get_books_from_page(url):
    try:
        response = requests.get(url)
        response.raise_for_status()
    except requests.RequestException as e:
        print(f"Erreur lors de la récupération de la page: {e}")
        return [], None

    soup = BeautifulSoup(response.content, "lxml")
    articles = soup.find_all("article", class_="product_pod")
    books = []
    for article in articles:
        titre = article.h3.a.get("title", "")
        prix = article.find("p", class_="price_color").text.strip()
        dispo = article.find("p", class_="instock availability").text.strip()
        books.append({"Titre": titre, "Prix": prix, "Disponibilité": dispo})
    return books, soup

def scrape_all_books(base_url=BASE_URL):
    url = base_url
    all_books = []
    visited_urls = set()

    while url and url not in visited_urls:
        visited_urls.add(url)
        books, soup = get_books_from_page(url)
        if soup is None:
            break
        all_books.extend(books)
        next_btn = soup.find("li", class_="next")
        if next_btn and next_btn.a:
            next_page = next_btn.a["href"]
            url = urljoin(url, next_page)
        else:
            break
    return all_books


def save_books_to_file(books, filename="books.csv", filetype="csv"):
    df = pd.DataFrame(books)
    if filetype == "csv":
        df.to_csv(filename, index=False)
        print(f"✅ Données sauvegardées dans {filename}")
    elif filetype == "excel":
        df.to_excel(filename, index=False)
        print(f"✅ Données sauvegardées dans {filename}")
    else:
        print("❌ Type de fichier non supporté. Utilisez 'csv' ou 'excel'.")

if __name__ == "__main__":
    books = scrape_all_books()
    # sauvegarder en CSV
    save_books_to_file(books, filename="books.csv", filetype="csv")
