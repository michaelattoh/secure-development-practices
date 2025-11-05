import os

# Load sensitive credentials from environment variables
db_user = os.getenv("DB_USER")
db_password = os.getenv("DB_PASSWORD")

print(f"Connected to DB as {db_user}")
