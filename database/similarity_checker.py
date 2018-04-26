
import pandas as pd

#importing the dataset
dataset = pd.read_csv('questions.tsv', delimiter='\t', quoting=3, error_bad_lines=False)

#ckeaning the dataset
import re
import nltk
#from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from nltk.stem.porter import PorterStemmer
corpus=[]
for i in range(0,len(dataset['S.No'])):
    review=re.sub('[^a-zA-Z0-9]',' ',dataset['Question'][i])
    review=review.lower()
    review=review.split()
    ps=PorterStemmer()
    review=[ps.stem(word) for word in review if not word in stopwords.words('english')]
    review=' '.join(review)
    corpus.append(review)

print(len(corpus))
#cleaning the question bank 
question_bank = pd.read_csv('temp.tsv', delimiter='\t', quoting=3)
qb_corpus=[]
for i in range(0,len(question_bank['S.No'])):
    count=0
    review=re.sub('[^a-zA-Z0-9]',' ',question_bank['Question'][i])
    review=review.lower()
    review=review.split()
    ps=PorterStemmer()
    review=[ps.stem(word) for word in review if not word in stopwords.words('english')]
    review=' '.join(review)
    qb_corpus.append(review)

#SIMILARITY CHECKING
threshold=0.60
count=0
corpus1=[]
'''token_a = nltk.word_tokenize(corpus[119])
token_b = nltk.word_tokenize(corpus[120])
ratio=len(set(token_a).intersection(token_b))/len(set(token_a).union(token_b))'''

for i in range(0,len(qb_corpus)):
    ratio=[]
    for j in range(0,len(corpus)):
        token_a=nltk.word_tokenize(qb_corpus[i])
        token_b=nltk.word_tokenize(corpus[j])
        ratio.append(len(set(token_a).intersection(token_b))/len(set(token_a).union(token_b)))
    for k in range(0,len(ratio)):
        if ratio[k] >= threshold:
            count+=1
            break
        else:
            continue
    if count>0:
        print('Rejected '+str(i))
    else:
        print('Accepted '+str(i))
        corpus1.append(qb_corpus[i])


#accepted questions
accepted_qb=pd.DataFrame(columns=['S.No','Question','Marks','Keyword','Difficulty'])

for i in range(0,len(corpus1)):
    review=re.sub('[^a-zA-Z0-9]',' ',question_bank['Question'][i])
    review=review.lower()
    review=review.split()
    ps=PorterStemmer()
    review=[ps.stem(word) for word in review if not word in stopwords.words('english')]
    review=' '.join(review)
#    print(review)
    if corpus1[i]==review:
        accepted_qb=accepted_qb.append(question_bank.iloc[i],ignore_index=True)

accepted_qb.to_csv(path_or_buf='questions.tsv',sep='\t',index=False,mode='a',quoting=3,header=False)

accp_ques=pd.DataFrame(columns=['Question','Marks','Keyword','Difficulty'])
accp_ques = accepted_qb.drop('S.No',axis=1)
accp_ques.to_csv(path_or_buf='temp2.tsv',sep='\t',index=False,mode='w',quoting=3,header=False)

'''a="5222.43"
float(a)
int(float(a))

#storing the accepted questions in the database
import MySQLdb
conn=MySQLdb.connect("localhost","root","","data")
cursor=conn.cursor()
for i in range(0,len(accepted_qb)):
    query="INSERT INTO questions(id,question,keyword,marks) VALUES (?,?,?,?)"
'''
'''NOT WORKING

    cursor.execute("INSERT INTO questions(id,question,keyword,marks) VALUES (%d,%s,%s,%d)",(int(accepted_qb['S.No'].iloc[i]), str(accepted_qb['Question'].iloc[i]), str(accepted_qb['Keyword'].iloc[i]), int(accepted_qb['Marks'].iloc[i])))
'''
'''
cursor.execute("SELECT * FROM questions")
rows=cursor.fetchall()
print("Total rows: ",cursor.rowcount)
for row in rows:
    print(row)
''' 