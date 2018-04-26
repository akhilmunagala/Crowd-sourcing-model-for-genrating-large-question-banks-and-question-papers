# -*- coding: utf-8 -*-
"""
Spyder Editor

This is a temporary script file.
"""

#importing the libraries
#import numpy as np
#import matplotlib.pyplot as plt
import pandas as pd

#importing the dataset
dataset = pd.read_csv('questions.tsv', delimiter='\t', quoting=3,error_bad_lines=False);

#cleaning the texts
import re
#import nltk
'''nltk.download('stopwords')
nltk.download('punkt')'''
from nltk.tokenize import word_tokenize
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

'''#cleaning the question bank 
question_bank = pd.read_csv('temp.tsv', delimiter='\t', quoting=3);
qb_corpus=[]
for i in range(0,len(question_bank['S.No'])):
    review=re.sub('[^a-zA-Z0-9]',' ',question_bank['Question'][i])
    review=review.lower()
    review=review.split()
    ps=PorterStemmer()
    review=[ps.stem(word) for word in review if not word in stopwords.words('english')]
    review=' '.join(review)
    qb_corpus.append(review)
'''

#generating keyword set
keywords=[]
for unique_words in dataset['Keyword']:
    if unique_words not in keywords:
        keywords.append(unique_words)
'''    if unique_words not in three_keywords:
        three_keywords.append(unique_words)
    if unique_words not in five_keywords:
        five_keywords.append(unique_words)
print(two_keywords) '''

#generating random question sets
import random
two_rand_ques={}
three_rand_ques={}
five_rand_ques={}

two_selected_keywords=[]
three_selected_keywords=[]
five_selected_keywords=[]

#sorting the dataset
#sorted=dataset.sort_values(['Marks'],ascending=[1])

#separating different weightage questions into lists
count_two=0
count_three=0
count_five=0

two=[]
three=[]
five=[]
i=0
for i in range(0,len(dataset['S.No'])):
    if dataset['Marks'].iloc[i]==2:
        two.append(dataset['S.No'].iloc[i])
    elif dataset['Marks'].iloc[i]==3:
        three.append(dataset['S.No'].iloc[i])
    elif dataset['Marks'].iloc[i]==5:
        five.append(dataset['S.No'].iloc[i])

#reading values from comand line
import sys
arg_list=[]
arg_list=sys.argv

#generating random 2m questions
for i in range(0,15):#arg_list[0]):
    x=random.randint(0,len(two)-1)
    key=two[x]
    value=dataset['Keyword'].iloc[key-1]
    if count_two==int(arg_list[1]):
#        print('Count2:',count_two)
        break
    elif value not in two_selected_keywords:
        count_two+=1
        two_rand_ques.update({key-1:value})
        #two_keywords.remove(value)
        two_selected_keywords.append(value)
    else: 
        continue

#generating random 3m questions
for i in range(0,15):#arg_list[1]):
    x=random.randint(0,len(three)-1)
    key=three[x]
    value=dataset['Keyword'].iloc[key-1]
    if count_three == int(arg_list[2]):
#        print('Count3:',count_three)
        break
    elif value not in three_selected_keywords:
        count_three+=1
        three_rand_ques.update({key-1:value})
        #three_keywords.remove(value)
        three_selected_keywords.append(value)
    else: 
        continue

#generating random 5m questions
for i in range(0,30):#arg_list[2]):
    x=random.randint(0,len(five)-1)
    key=five[x]
    value=dataset['Keyword'].iloc[key-1]
    if count_five == int(arg_list[3]):
#        print('Count5:',count_five)
        break
    elif value not in five_selected_keywords:
        count_five+=1
        five_rand_ques.update({key-1:value})
        #five_keywords.remove(value)
        five_selected_keywords.append(value)
    else: 
        continue
'''#SIMILARITY CHECKING
threshold=0.75
count=0

token_a = nltk.word_tokenize(corpus[119])
token_b = nltk.word_tokenize(corpus[120])
ratio=len(set(token_a).intersection(token_b))/len(set(token_a).union(token_b))

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
        corpus.append(corpus[i])
'''

qp = pd.DataFrame(columns=['S.No','Question','Marks','Keyword','Difficulty'])
#Storing the generated questions in a separate file
#for i in range(0,len(dataset['S.No'])):
for k in two_rand_ques.keys():
    for i in range(len(dataset['S.No'])):
        if dataset['S.No'].iloc[i-1]==k:
            qp=qp.append(dataset.iloc[k],ignore_index=True)

for k in three_rand_ques.keys():
    for i in range(len(dataset['S.No'])):
        if dataset['S.No'].iloc[i-1]==k:
            qp=qp.append(dataset.iloc[k],ignore_index=True)

for k in five_rand_ques.keys():
    for i in range(len(dataset['S.No'])):
        if dataset['S.No'].iloc[i-1]==k:
            qp=qp.append(dataset.iloc[k],ignore_index=True)

qp1=pd.DataFrame(columns=['Question','Marks','Keyword','Difficulty'])
qp1 = qp.drop('S.No',axis=1)
qp1.to_csv(path_or_buf='question_paper.tsv',sep='\t',mode='w',index=False,quoting=3,header=False)

'''
REPEATED CODE START

review = re.sub('[^a-zA-Z0-9()]',' ',dataset['Question'][0])
review = review.lower()
#removing insignificant words like the,an,a,etc..
review = review.split()
review = [word for word in review if not word in stopwords.words('english')]
#stemming
ps=PorterStemmer()
review=[ps.stem(word) for word in review if not word in stopwords.words('english')]
review=' '.join(review)

REPEATED CODE END

#creating bag of words model
from sklearn.feature_extraction.text import CountVectorizer
cv=CountVectorizer(max_features=1500)
X=cv.fit_transform(corpus).toarray()
y=dataset.iloc[:,0].values

#applying Naive Bayes Classification
from sklearn.cross_validation import train_test_split
X_train,X_test,y_train,y_test=train_test_split(X,y,test_size=0.20,random_state=0)

#feature scaling
from sklearn.preprocessing import StandardScaler
sc=StandardScaler()
X_train=sc.fit_transfrom(X_train)
X_test=sc.transform(X.test)

#fitting Naive Bayes to the training set
from sklearn.naive_bayes import GaussianNB
classifier=GaussianNB()
classifier.fit(X_train,y_train)

#predicting the test set result
y_pred=classifier.predict(X_test)

#making the confusion matrix
from sklearn.metrics import confusion_matrix
cm=confusion_matrix(y_test,y_pred)

'''