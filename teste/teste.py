from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
import time

options = webdriver.ChromeOptions()
options.add_experimental_option("detach", True) # Mantem o navegador aberto

driver = webdriver.Chrome(
    service=webdriver.chrome.service.Service(ChromeDriverManager().install()), options=options
)

driver.get("https://www.youtube.com/")
time.sleep(2)
#  aguarda 2 segundos para a pagina carregar

search_box = driver.find_element(By.NAME, "search_query")
search_box.send_keys("manual do mundo boravê")
search_box.send_keys(Keys.RETURN)
time.sleep(3)