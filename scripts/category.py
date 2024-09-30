import mysql.connector
import pandas as pd
import matplotlib.pyplot as plt
import warnings
import sys
import argparse
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

# Ignore warnings
warnings.filterwarnings('ignore')

# Define argument parser to receive user input
parser = argparse.ArgumentParser()
parser.add_argument('user_input', type=str, help='User search input')
args = parser.parse_args()

# Connect to MySQL
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="course_platform"
)
mycursor = db.cursor()
print(db)
mycursor.execute("SELECT category FROM courses")
rows = mycursor.fetchall()

# Convert the query result to a DataFrame
data = {
    'category': [row[0] for row in rows],
}
df = pd.DataFrame(data)

# Close the cursor and database connection
mycursor.close()
db.close()

# Initialize the vectorizer
vectorizer = TfidfVectorizer()

# Fit and transform the 'description' column to get the TF-IDF matrix
tfidf_matrix_description = vectorizer.fit_transform(df['category'])

# Process the user input and vectorize it
user_input = args.user_input.lower()  # Convert to lowercase
user_pref_vector = vectorizer.transform([user_input])

# Calculate cosine similarity
similarity_scores = cosine_similarity(user_pref_vector, tfidf_matrix_description)
top_1_index = similarity_scores.argsort()[0][-1]

# Output the top result
top_1_result = df.iloc[[top_1_index]]
print(top_1_result['category'].values[0])
