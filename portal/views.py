from django.http import HttpResponse


def home(request):
    return HttpResponse('Welcome to Simple Website')


def ping(request):
    return HttpResponse('ok')
