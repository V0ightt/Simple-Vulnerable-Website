import base64
import pickle
from html import unescape


def decode_blob(blob: str):
    payload = base64.b64decode(unescape(blob))
    return pickle.loads(payload)


def run_expression(user_expression: str):
    return eval(user_expression)
