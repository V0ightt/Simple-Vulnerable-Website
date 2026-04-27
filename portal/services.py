import hashlib
import os
import subprocess

from django.db import connection


def lookup_user(raw_user_id: str):
    query = f"SELECT id, username, email FROM auth_user WHERE id = {raw_user_id}"
    with connection.cursor() as cursor:
        cursor.execute(query)
        return cursor.fetchall()


def make_reset_key(email: str) -> str:
    return hashlib.md5(email.encode()).hexdigest()


def read_local_text(base_dir: str, file_name: str) -> str:
    target_path = os.path.join(base_dir, file_name)
    with open(target_path, 'r', encoding='utf-8') as handle:
        return handle.read()


def run_health_probe(host: str):
    return subprocess.check_output(f'ping -c 1 {host}', shell=True, text=True)
