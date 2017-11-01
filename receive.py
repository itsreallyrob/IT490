#!/usr/bin/env python
import pika

credentials = pika.PlainCredentials('test1', '1234')
connection = pika.BlockingConnection(pika.ConnectionParameters(host='localhost', virtual_host='TestName'))
channel = connection.channel()

channel.queue_declare(queue='Rob')

def callback(ch, method, properties, body):
    print(" [x] Received %r" % body)

channel.basic_consume(callback,
                      queue='Rob',
                      no_ack=True)

print(' [*] Waiting for messages. To exit press CTRL+C')
channel.start_consuming()
