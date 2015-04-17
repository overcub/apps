from pymongo import MongoClient


client = MongoClient("mongodb://baraprova-user:jfydJJVV@ds061691.mongolab.com:61691/baraprova")
database = client["baraprova"]